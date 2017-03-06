var idsession, username, firstname, lastname, email, link, gender;
    function onSuccess(googleUser) {
        var profile = googleUser.getBasicProfile();
        gapi.client.load('plus', 'v1', function () {
            var request = gapi.client.plus.people.get({
                'userId': 'me'
            });
            //Display the user details
            request.execute(function (response) {
                var profileHTML = '<a href="javascript:void(0);" onclick="signOut();">Sign out</a></div>';

                idsession = response.id;
                firstname = response.name.givenName;
                lastname = response.name.lastName;
                document.getElementById('text1').innerHTML = "Bienvenido " + response.name.givenName;
                document.getElementById('url_field').innerHTML = "http://localhost/" + response.id;
                document.getElementById('thanks').innerHTML = "Gracias por tu interés";
                document.getElementById('text2').innerHTML = "Sea uno de los primeros en probar nuestro Producto XYZ totalmente gratis...";
                document.getElementById('product').style.visibility = "hidden";
                document.getElementById('product').src = "";
                document.getElementById('referal_link').style.display = "block";
                document.getElementById('social_links').style.display = "none";
                document.getElementById('slider').style.display = "block";
                $('.userContent').html(profileHTML);
            });
        });
    }
    function onFailure(error) {
        alert(error);
    }
    function renderButton() {
        gapi.signin2.render('gSignIn', {
            'scope': 'profile email',
            'width': 240,
            'height': 50,
            'longtitle': true,
            'theme': 'dark',
            'onsuccess': onSuccess,
            'onfailure': onFailure
        });
    }
    function signOut() {
        document.getElementById('thanks').innerHTML = "";
        document.getElementById('product').style.visibility = "visible";
        document.getElementById('product').src = "images/product.png";
        document.getElementById('text1').innerHTML = "Product XYZ";
        document.getElementById('text2').innerHTML = "Nuevo producto xyz, que te permite hacer xyz cosas en x menor tiempo. Ingresa y participa por uno de los sorteos que tenemos para que te lleves un kit completamente gratis";
        document.getElementById('social_links').style.display = "block";
        document.getElementById('slider').style.display = "none";
        document.getElementById('referal_link').style.display = "none";

        var auth2 = gapi.auth2.getAuthInstance();
        auth2.signOut().then(function () {
            $('.userContent').html('');
            $('#gSignIn').slideDown('slow');
        });
    }
