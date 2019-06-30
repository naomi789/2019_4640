import { Component, OnInit, ViewChild, ElementRef } from '@angular/core';
import { SignUpInfo } from '../sign-up-info';
import{ HttpClient, HttpErrorResponse, HttpParams } from '@angular/common/http';  //the first one is most important; the second two provide additional abilities in case we need special treatment
import { NgForm } from '@angular/forms';

@Component({
  selector: 'app-signup',
  templateUrl: './signup.component.html',
  styleUrls: ['./signup.component.css']
})
export class SignupComponent implements OnInit {

  constructor(private http: HttpClient) { }

  ngOnInit() {
  }

  log(x){
    console.log(x);
  }

  newUser = new SignUpInfo('', '', '', '');


  signUp(data){
    let params = JSON.stringify(data);

    this.http.post<SignUpInfo>('http://localhost/2019_4640/project/src/app/ngphp-post.php', data).subscribe((data) => {
      console.log('Got data from backend');
      this.newUser = data;
      if (this.newUser.name == 'userAlreadyExists'){
        //let theForm = this.newUser.signUpForm;
        // let theForm = document.getElementById("signUpForm");
        // let link = document.createElement("a");
        // link.setAttribute("href", "sign-in.php");
        // link.innerHTML = "sign in.";
        // let errorMessage = document.createTextNode("An account is already registered with this email address. Please ");
        // let errorElement = document.createElement("p");
        // errorElement.appendChild(errorMessage);
        // errorElement.setAttribute("class", "alert alert-danger");
        // link.setAttribute("class", "alert alert-danger error-sign-in-link");
        // errorElement.appendChild(link);
        // theForm.appendChild(errorElement);  
        let warningTag = document.getElementById("alreadyExistsWarning");
        warningTag.style.display = "block"; 
      }
      console.log(this.newUser);
    }, (error)=> {
      console.log('Error', error);
    })

  }

}
