export default {
    created() {
        let vm = this

        document.addEventListener('keyup', function (evt) {
            if (evt.keyCode === 27) {
                vm.$emit('close')
            }
        });
    },
};