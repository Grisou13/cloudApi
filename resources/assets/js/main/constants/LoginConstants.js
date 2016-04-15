import {BASE_URL} from '../../ApiConstants'
const _consts =
{
  BASE_URL: BASE_URL,
  LOGIN_URL: BASE_URL + '/auth/jwt/get_token',
  SIGNUP_URL: BASE_URL + '/v1/users',
  REFRESH_URL:BASE_URL + '/auth/jwt/refresh_token',
  LOGIN_USER: 'LOGIN_USER',
  LOGOUT_USER: 'LOGOUT_USER'
}
export default _consts
module.exports = _consts
