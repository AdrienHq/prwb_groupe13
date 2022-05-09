var signupForm, pseudo, errPseudo, password, errPassword, passwordConfirm, errPasswordConfirm, btn;

    $(function () {
        signupForm = $("#signupForm");
        nom = $("#nom");             
        prenom = $("#prenom");
        pseudo = $("#pseudo");
        ddn = $("#ddn");
        password = $("#password");
        errPassword = $("#errPassword");
        passwordConfirm = $("#passwordConfirm");
        errPasswordConfirm = $("#errPasswordConfirm");
        mail = $("#mail");
        telephone = $("#telephone");
        btn = $("#btn");
        btn.attr("disabled", true);
        $("input:text:first").focus();
    });

    function checkPseudo() {
        errPseudo.html("");
        var value = pseudo.val();
        btn.attr("disabled", false);
        if (!(/^.{3,16}$/).test(value)) {
            errPseudo.html("<label title='Pseudo length must be between 3 and 16.' class='error'>mauvais pseudo</label><br/>");
            btn.attr("disabled", true);
        }
        else if (!(/^[a-zA-Z][a-zA-Z0-9]*$/).test(value)) {
            errPseudo.html("<label title='Pseudo must start by a letter and must contain only letters and numbers.' class='error'>mauvais pseudo</label><br/>");
            btn.attr("disabled", true);
        }
        checkPseudoExists();
        return !btn.attr("disabled");
    }

    function checkPseudoExists() {
        var timer;
        var waitMsg = "checking pseudo.";
        $.get("member/exists_service/"+pseudo.val(), function (response) {
            //errPseudo.html("");
            if (response === "true") {
                errPseudo.html("<label title='' class='errors'>This pseudo already exists.</label><br/>");
                btn.attr("disabled", true);
            }
            clearTimeout(timer);
        });
        var callback = function () {
            waitMsg += '.';
            if (waitMsg.length > 25)
                waitMsg = "checking pseudo.";
            errPseudo.html("<label class='errors' style='color:gray'><i>" + waitMsg + "</i></label><br/>");
            timer = setTimeout(callback, 50);
        };
        timer = setTimeout(callback, 50);
        return !btn.attr("disabled");
    }

    function checkPassword(field, error) {
        error.html("");
        var value = field.val();
        btn.attr("disabled", false);
        var hasUpperCase = /[A-Z]/.test(value);
        var hasNumbers = /\d/.test(value);
        var hasPunct = /['";:,.\/?\\-]/.test(value);
        if (!(hasUpperCase && hasNumbers && hasPunct)) {
            error.html("<label title='Password must contain one uppercase letter, one number and one punctuation mark.' class='errors'>mauvais mot de passe</label><br/>");
            btn.attr("disabled", true);
        }
        else if (!(/^.{8,16}$/).test(value)) {
            error.html("<label title='Password length must be between 3 and 16.' class='errors'>mauvais mot de passe</label><br/>");
            btn.attr("disabled", true);
        }
        return !btn.attr("disabled");
    }

    function checkPasswords() {
        // D'abord il faut vérifier chaque champ séparément
        var valid = checkPseudo();
        valid = checkPassword(password, errPassword) && valid;   // il faut mettre les conditions dans cet ordre car sinon,
                                                                 // si valid est faut, checkPassword() n'est pas appelée!
        valid = checkPassword(passwordConfirm, errPasswordConfirm) && valid;
        // ensuite on vérifie si les deux mots de passe sont bien identiques
        var p1 = password.val();
        var p2 = passwordConfirm.val();
        if (p1 !== p2 && p1 !== "" && p2 !== "") {
            errPasswordConfirm.html("<label title='' class='error'>You have to enter twice the same password.</label><br/>");
            valid = false;
        }
        btn.attr("disabled", !valid);
        return valid;
    }