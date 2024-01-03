function validator(options) {
    function getparent(inputElement, selector) {
        while (inputElement.parentElement) {
            if (inputElement.parentElement.matches(selector)) {
                return inputElement.parentElement;
            }
            inputElement = inputElement.parentElement
        }
    }
    
    var selectorRules = {};
    function validate(inputElement, rule) {
        // console.log(inputElement,rule);
        var errorMessage;
        var rules = selectorRules[rule.selector]
        for (var i = 0; i < rules.length; i++) {
                errorMessage = rules[i](inputElement.value)
            if (errorMessage) {
                break;
            }
        }
        var errorElement = getparent(inputElement, options.formGroupselector).querySelector('.form-message')
        console.log(errorElement)
        if (errorMessage) {
            errorElement.innerText = errorMessage
        }
        else {
            errorElement.innerText = ''
        }
        return !errorMessage;
    }
    var formElement = document.querySelector(options.form)
    var submitBtn=document.querySelector(options.subMitBtn)
    if (formElement) {
        if(submitBtn){
            submitBtn.onclick=function(e){
                var isFormValid = true; 
                  options.rulers.forEach(function (rule) {
                      var inputElement = formElement.querySelector(rule.selector)
                      var isValid = validate(inputElement, rule)
                      if (!isValid) {
                          isFormValid = false;
                      }
                  });
                  if (isFormValid) {
                    let passwordq=document.getElementById("password");
                    let confirmPasswordq=document.getElementById("confirmPassword");
                    $.ajax({
                      type: "post",
                      url:'handleChangePass.php',
                      data:{password:passwordq.value,confirmPassword:confirmPasswordq.value},
                    })
                    .done(function(data){
                      if(data==0){
                        window.location.href='/DOANCS22/user/formL.php';
                      }
                      else if(data==1){
                        passwordq.value='';
                        confirmPasswordq.value=''; 
                        document.getElementById("notificationmethod").style.display = "block";
                      }
                    })
                    .fail(function(data){
                      alert('Please')
                    })
                  }
                  else{
                    e.preventDefault()
                  }
              }
        }
        formElement.onsubmit = function (e) {
            e.preventDefault()
            var isFormValid = true; 
            options.rulers.forEach(function (rule) {
                console.log(rule)
                var inputElement = formElement.querySelector(rule.selector)
                var isValid = validate(inputElement, rule)
                if (!isValid) {
                    isFormValid = false;
                }
            });
            if (isFormValid) {
                formElement.submit();
            }
        }
        options.rulers.forEach(function (rule) {
            if (Array.isArray(selectorRules[rule.selector])) {
                selectorRules[rule.selector].push(rule.test)
            }
            else {
                selectorRules[rule.selector] = [rule.test];
            }
            var inputElements = formElement.querySelector(rule.selector)
            // console.log(rule)
            // Array.from(inputElements).forEach(function (inputElement) {
                inputElements.onblur = function () {
                    validate(inputElements, rule)
                }
                inputElements.oninput = function (e) {
                    var errorElement = getparent(inputElements, options.formGroupselector).querySelector('.form-message')
                    errorElement.innerText = ''
                    getparent(inputElements, options.formGroupselector).classList.remove('invalid')
                }

            // })
        })
    }
}
validator.isRequired = function (selector) {
    return {
        selector: selector,
        test: function (value) {
            return value ? undefined : 'Vui lòng nhập trường này'
        }
    }
}
validator.isPhone = function (selector) {
    return {
        selector: selector,
        test: function (value) {
            var regax = /^(0|\+84)?(3[2-9]|5[6-9]|7[0-9]|8[0-9]|9[0-9])[0-9]{7}$/;
            return regax.test(value) ? undefined : "Trường này ko phải là số điện thoại"
        }
    }
}
validator.isEmail = function (selector) {
    return {
        selector: selector,
        test: function (value) {
            var regax = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
            return regax.test(value) ? undefined : "Trường này phải là email "
        }
    }
}
validator.minLength = function (selector, min) {
    return {
        selector: selector,
        test: function (value) {
            return value.length >= min ? undefined : `Vui lòng nhập tối thiêu ${min} ký tự`
        }
    }
}
validator.confirmPass = function (selector, getValue, message) {
    return {
        selector: selector,
        test: function (value) {
            return getValue() === value ? undefined : message
        }
    }
}