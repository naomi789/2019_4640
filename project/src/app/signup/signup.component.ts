import { Component, OnInit, ViewChild, ElementRef } from '@angular/core';
import { SignUpInfo } from '../sign-up-info';
import{ HttpClient, HttpErrorResponse, HttpParams } from '@angular/common/http';  //the first one is most important; the second two provide additional abilities in case we need special treatment
import { NgForm } from '@angular/forms';
import { headersToString } from 'selenium-webdriver/http';

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
        let warningTag = document.getElementById("alreadyExistsWarning");
        warningTag.style.display = "block"; 
      }
      else{
        //place session AND cookie information here?
        //redirect throws cors policy error - for some reason it won't work if placed in ngphp-post.php either
        
        window.location.href = "http://localhost/2019_4640/index.php?loggedIn=true";
      }
      console.log(this.newUser);
    }, (error)=> {
      console.log('Error', error);
    })

  }

}
