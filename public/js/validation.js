const app = new Vue({
    el: '#validate',
    data: {
        username: '',
        email: '',
        responseUsername: '',
        responseEmail: ''
    },
    methods: {
        checkUsername: function () {
            let username = this.username.trim();
            if (username != '') {
                axios.get('validation.php', {
                    params: {
                        username: username
                    }
                })
                    .then(function (response) {
                        console.log(response);
                        console.log(response.data);
                        app.responseUsername = response.data;
                    })
                    .catch(function (error) {
                        console.log(error);
                    });

            } else {
                this.responseUsername = "";
            }
        },
        checkEmail: function () {
            let email = this.email.trim();
            if (email != '') {
                axios.get('validation.php', {
                    params: {
                        email: email
                    }
                })
                    .then(function (response) {
                        console.log(response);
                        console.log(response.data);
                        app.responseEmail = response.data;
                    })
                    .catch(function (error) {
                        console.log(error);
                    });

            } else {
                this.responseEmail = "";
            }
        }
    }
})