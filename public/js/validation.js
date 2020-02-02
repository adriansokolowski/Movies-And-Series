var app = new Vue({
    el: '#validate',
    data: {
        username: '',
        hasError: 0,
        responseMessage: ''
    },
    methods: {
        checkUsername: function () {
            var username = this.username.trim();

            if (username != '') {

                axios.get('validation.php', {
                    params: {
                        username: username
                    }
                })
                    .then(function (response) {
                        app.hasError = response.data;
                        if (response.data == 0) {
                            app.responseMessage = response.data;

                        } else {
                            app.responseMessage = response.data;
                        }
                    })
                    .catch(function (error) {
                        console.log(error);
                    });

            } else {
                this.responseMessage = "";
            }
        }
    }
})