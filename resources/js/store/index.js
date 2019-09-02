import Vue from 'vue';
import Vuex from 'vuex';

import 'es6-promise/auto'

Vue.use(Vuex);

export default new Vuex.Store({
    state: {
        token: localStorage.getItem('token') || '',
        status: '',
        credit: 0,
        fullname: '',
    },
    getters: {
        isAuthenticated: state => !!state.token,
        authStatus: state => state.status,
    },
    actions: {
        login({commit}, logindata) {
            return new Promise((resolve, reject) => { // The Promise used for router redirect in login
                commit('auth_request')
                axios({url: '/api/auth/login', data: logindata, method: 'POST' })
                .then(resp => {
                    const token = `${resp.data.token_type} ${resp.data.access_token}`;
                    localStorage.setItem('token', token) // store the token in localstorage
                    commit('auth_success', token, logindata)
                    // you have your token, now log in your user :)
                    resolve(resp)
                })
                .catch(err => {
                    commit('auth_error', err)
                    localStorage.removeItem('token') // if the request fails, remove any possible user token if possible
                    reject(err)
                })
            })
        },
        register({commit}, user){
            return new Promise((resolve, reject) => {
                commit('auth_request')
                axios({url: '/api/auth/signup', data: user, method: 'POST' })
                .then(resp => {
                    const token = `${resp.data.token_type} ${resp.data.access_token}`;
                    localStorage.setItem('token', token) // store the token in localstorage
                    commit('auth_success', token, user)
                    // you have your token, now log in your user :)
                    resolve(resp)
                })
                .catch(err => {
                    commit('auth_error', err)
                    localStorage.removeItem('token') // if the request fails, remove any possible user token if possible
                    reject(err)
                })
            })
        },
        logout({commit}) {
            return new Promise((resolve, reject) => {
                commit('logout')
                axios({url: '/api/auth/logout', method: 'GET' })
                .then(resp => {
                    localStorage.removeItem('token')
                    // remove the axios default header
                    delete axios.defaults.headers.common['Authorization']
                })
                .catch(err => {
                    commit('auth_error', err)
                    reject(err)
                })
                resolve()
            })
        },
        getInfo({commit}) {
            return new Promise((resolve, reject) => {
                axios({url: '/api/user/info', method: 'GET' })
                .then(resp => {
                    commit('info', {fullname: resp.data.fullname, credit: resp.data.credit})
                    resolve(resp)
                })
                .catch(err => {
                    commit('auth_error', err)
                    reject(err)
                })
            })
        }
        
    },
    mutations: {
        auth_request(state) {
            state.status = 'loading'
        },
        auth_success(state, token, data) {
            state.status = 'success'
            state.token = token
        },
        auth_error(state) {
            state.status = 'error'
        },
        logout(state) {
            state.status = ''
            state.token = ''
        },
        info(state, data) {
            state.fullname = data.fullname
            state.credit = data.credit
        }
    }
});