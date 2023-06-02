export default function ({ $axios, store, redirect }) {
  $axios.onRequest((config) => {
    replaceUrlParams(config.url, [])
    if (store.state.auth) {
      config.headers.common.Authorization = store.state.auth.token
    } else {
      console.error('auth token module not found')
    }
  })

  $axios.onError((error) => {
    const code = parseInt(error.response && error.response.status)
    if (code === 404) {
      redirect('/404')
    }
    return Promise.reject(error)
  })

  function replaceUrlParams(url, params) {
    url = cleanPath(url)
    let cnt = 0
    return url.replace(/:\w+/g, function ($0) {
      if (cnt === params.length) cnt = 0
      return params[cnt++] // replace 5 matches of the keyword every with 5 synonyms in the array
    })
  }

  function cleanPath(path) {
    return path.replace(/\/+$/, '')
  }
}
