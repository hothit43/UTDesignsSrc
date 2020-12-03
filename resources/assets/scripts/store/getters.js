export default {
        formURL: (state) => `${state.wpData.rest_url}/send-contact-form/v1/contact`,
        activePost : (state) => state.activePost
}