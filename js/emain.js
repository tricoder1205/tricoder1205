      //check null
      let check={};
      
      function checkNull(data){
       if (!data) return false;
      return true;
      }
      function checkEmail(email){
          const regex = new RegExp(/([a-zA-Z0-9_/./-])+\@gmail.com/g);
          return regex.test(email);
      }

      function checkPhoneNumber(phoneNumber){
          if(Number.isNaN(phoneNumber) || phoneNumber.length !==10 ) return false;
          return true  ;
      }
      function checkPass(idPass,pass){
          var pass = document.getElementById(idPass).children[1].value;
          if(pass.length <= 6){
              return false;
          }else {
              return true;
          }
      }
      function checkSamePass(idPass,repass){
          var pass = document.getElementById(idPass).children[1].value;
          if(pass !== repass || repass.length <= 6){ 
            return false;}
          return true;
      }
      function checkFullName(idname){
        var fullname = document.getElementById(idname).children[1].value;
        if ( fullname === null ){ 
            return false;
        }
        else{
            return true;
        }
    }

      function validate(e,id , checked=true){
          var form = document.getElementById(id);
              var i;
          if((checkNull(e) && checked)) {
              let valueChecked={[id]:true};
              check={...check,...valueChecked};
              if(form.children.length == 2){
               i = document.createElement("i");
               i.setAttribute("class", "bi bi-check-square");
               i.setAttribute("style", "color: green");
              }else{
                  i= form.lastChild;
                  i.className = 'bi bi-check-square';
                  i.style="color: green";
              }
          }else{
              let valueChecked={[id]:false};
              check={...check,...valueChecked};
              if(form.children.length == 2){
               i = document.createElement("i");
               i.setAttribute("class", "bi bi-x-octagon ");
               i.setAttribute("style", "color:red");
              }else{
                  i= form.lastChild;
                  i.className = 'bi bi-x-octagon '; 
                  i.style='color:red';
              }
          }
          form.appendChild(i);
      }

      function onSubmitFormReg(){
        const registerForm = document.getElementById('registerForm');
        registerForm.addEventListener('submit',function(e){
            e.preventDefault();
        });
            if(Object.keys(check).length === 7){
             for([key,value] of Object.entries(check)){
                 if(value === false) {
                    const input = document.getElementById(key).children[1];
                    input.focus();
                     return;
                 }
             }
             registerForm.submit();
        }else {
            alert("Vui lòng điền đầy đủ thông tin !");
            return;
        }
       }


       