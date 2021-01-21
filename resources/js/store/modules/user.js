import axios from '../../axios'
import { useToast } from 'vue-toastification'

const toast = useToast()

// initial state
const state = () => ({
  profile: {
      name: '',
      profilePhotoUrl: '',
      email: ''
  },
  errors: {
      profileData: {},
      profilePhoto: {},
  }
})

// getters
const getters = {
    userProfile (state) {
      return state.profile
    }
  }

// actions
const actions = {
    updateUserProfile ({ commit }, { submitRoute, profileData, loading}) {
        loading.showLoading()
        commit('setUserProfileDataErrors', {})

        axios.put(submitRoute, profileData).then((res)=>{
            if(res.status === 200) {
                commit('setUserProfileDataErrors', {})
                commit('setUserProfile', res.data.data)
                toast.success(res.data.message)

            } else {
                toast.error('Unknown Error!')
                console.log('res data', res)
            }

        }).catch(err => {
            if (err.response && err.response.status === 422) {
                commit('setUserProfileDataErrors', err.response.data.data)
                toast.error('Form Error!')

            } else {
                toast.error('Unknown Server Error!')
                console.error('catch error data', err)
            }
        }).finally(() => {
            loading.hideLoading()
        })
    },
    updateProfilePhoto ({ commit }, {profilePhoto, submitRoute, modal, loading}) {
        if(!profilePhoto || !profilePhoto.target || !profilePhoto.target.files[0]) {
            return toast.warning('Please choose a photo!')
        }

        loading.showLoading()
        commit('setUserProfilePhotoErrors', {})

        const formData= new FormData()
        formData.append('photo', profilePhoto.target.files[0])
        formData.append('type', 'photo')
        formData.append('_method', 'PUT');

        axios({
            method: 'post',
            url: submitRoute,
            data: formData,

        }).then((res)=>{
            if(res.status === 200) {
                modal.hideModal()
                profilePhoto.target.value = null
                commit('setUserProfilePhotoErrors', {})
                commit('setUserProfile', res.data.data)
                toast.success(res.data.message)

            } else {
                toast.error('Unknown Error!')
                console.log('res data', res)
            }

        }).catch(err => {
            if (err.response && err.response.status === 422) {
                commit('setUserProfilePhotoErrors', err.response.data.data)
                toast.error('Form Error!')

            } else {
                toast.error('Unknown Server Error!')
                console.error('catch error data', err)
            }
        }).finally(() => {
            loading.hideLoading()
        })
    }
}

// mutations
const mutations = {
    setUserProfile (state, profile) {
        state.profile = profile
    },
    setUserProfileDataErrors (state, errors) {
        state.errors.profileData = errors
    },
    setUserProfilePhotoErrors (state, errors) {
        state.errors.profilePhoto = errors
    },
}

export default {
  namespaced: true,
  state,
  getters,
  actions,
  mutations
}
