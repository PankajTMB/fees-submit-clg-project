"use strict";
    let addmisionForm = document.querySelector("#addmisionForm");
    let feesSubmitForm = document.querySelector("#feesSubmitForm");
    let feesDeposite = document.querySelector("#feesDeposite");
    

    let studentData = (ajaxResponse) => { 
        
        let requestResponse = document.querySelector("#requestResponse");
        let table  = `
                <table style=" width: 100%; margin:0 auto 50px; max-width: 700px; width: 100%; padding: 25px;">
                    <tr><th style="font-size: 24px; margin-bottom: 25px;" colspan="2">STUDENT DATA</th></tr>
                    <tr><td style="padding: 5px 10px;width: 50%;border: 1px solid black;font-weight: 700;"> Roll No</td>   <td style="padding: 5px 10px; border: 1px solid #000;width: 50%; ">${ajaxResponse.roll_no}</td></tr>
                    <tr><td style="padding: 5px 10px;width: 50%;border: 1px solid black;font-weight: 700;"> Name</td>   <td style="padding: 5px 10px; border: 1px solid #000;width: 50%; ">${ajaxResponse.name }</td></tr>
                    <tr><td style="padding: 5px 10px;width: 50%;border: 1px solid black;font-weight: 700;"> Gende</td>   <td style="padding: 5px 10px; border: 1px solid #000;width: 50%; ">${ajaxResponse.gender }</td></tr>
                    <tr><td style="padding: 5px 10px;width: 50%;border: 1px solid black;font-weight: 700;"> Father Name</td>   <td style="padding: 5px 10px; border: 1px solid #000;width: 50%; ">${ajaxResponse.father_name }</td></tr>
                    <tr><td style="padding: 5px 10px;width: 50%;border: 1px solid black;font-weight: 700;"> Mother Name </td>   <td style="padding: 5px 10px; border: 1px solid #000;width: 50%; ">${ajaxResponse.mother_name }</td></tr>
                    <tr><td style="padding: 5px 10px;width: 50%;border: 1px solid black;font-weight: 700;"> Email</td>   <td style="padding: 5px 10px; border: 1px solid #000;width: 50%; ">${ajaxResponse.email }</td></tr>
                    <tr><td style="padding: 5px 10px;width: 50%;border: 1px solid black;font-weight: 700;"> Number</td>   <td style="padding: 5px 10px; border: 1px solid #000;width: 50%; ">${ajaxResponse.number }</td></tr>
                    <tr><td style="padding: 5px 10px;width: 50%;border: 1px solid black;font-weight: 700;"> Second Number</td>   <td style="padding: 5px 10px; border: 1px solid #000;width: 50%; ">${ajaxResponse.number2 }</td></tr>
                    <tr><td style="padding: 5px 10px;width: 50%;border: 1px solid black;font-weight: 700;"> Class Name</td>   <td style="padding: 5px 10px; border: 1px solid #000;width: 50%; ">${ajaxResponse.classname }</td></tr>
                    <tr><td style="padding: 5px 10px;width: 50%;border: 1px solid black;font-weight: 700;"> Class Year</td>   <td style="padding: 5px 10px; border: 1px solid #000;width: 50%; ">${ajaxResponse.classyear }</td></tr>
                    <tr><td style="padding: 5px 10px;width: 50%;border: 1px solid black;font-weight: 700;"> Toal Fees</td>   <td style="padding: 5px 10px; border: 1px solid #000;width: 50%; ">${ajaxResponse.total_fees  }</td></tr>
                    <tr><td style="padding: 5px 10px;width: 50%;border: 1px solid black;font-weight: 700;"> Pending Fees</td>   <td style="padding: 5px 10px; border: 1px solid #000;width: 50%; ">${ajaxResponse.pending_fee }</td></tr>
                </table>
        `;

        requestResponse.innerHTML = table ;
        feesDeposite.setAttribute("style","display: block;" );
        return true;
    };


    


    let ajax = (e,form) =>{
        e.preventDefault();
        let formData = new FormData(form);
        formData.append("formName",form.id);
        let xhr = new XMLHttpRequest();
        xhr.open("POST","form.php", true);
        xhr.onreadystatechange = function () {
            if (xhr.readyState == 4 && xhr.status == 200) {
                let ajaxResponse =  this.responseText;
                let dataFlag = false;
                if (ajaxResponse == null) {
                    alert("ENTER VALID ROLL NO");
                }
                
                try {
                    let jsonData = JSON.parse(ajaxResponse);                    
                    dataFlag = studentData(jsonData);
                } catch (error) {
                    console.log(error);
                }
                
                
                if(!dataFlag && ajaxResponse != null){
                    alert(ajaxResponse);
                }
            }
        };
        
        xhr.send(formData);
    }




    try {
        feesSubmitForm.addEventListener("submit",(e)=>{
            ajax(e,feesSubmitForm);
            document.querySelector("[name=depositeFeesRollNo]").value = document.querySelector("#fetchRollnoData").value;
        });    
        
    } catch (error) {
        console.log(error)
    }
    try {
        addmisionForm.addEventListener("submit",(e)=>{
            ajax(e,addmisionForm);
            addmisionForm.reset();
        });    
    } catch (error) {
        console.log(error)
    }
    try {
        feesDeposite.addEventListener("submit",(e)=>{
            let depositeCash =  document.querySelector("[name='depositeFees']"); 
            if(depositeCash.value.includes("-")){
                alert("Enter Correct value");
                e.preventDefault();
            }else{
                ajax(e,feesDeposite);
                feesDeposite.reset();
                feesSubmitForm.reset();
            }
            
        });    
    } catch (error) {
        console.log(error)
    }
    
    
