import { Component, OnInit } from '@angular/core';
import { SignUpInfo } from '../sign-up-info';
import{ HttpClient, HttpErrorResponse, HttpParams } from '@angular/common/http';  //the first one is most important; the second two provide additional abilities in case we need special treatment

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

  responsedata = {};   //this should should be instance of form, instantiated w/ empty strings

  senddata(data){
    let params = JSON.stringify(data);

    this.http.get('http://localhost/ngphp-get.php?str='+params).subscribe((data) => {
      console.log('Got data from backend', data);
      this.responsedata = data;
    }, (error)=> {
      console.log('Error', error);
    })

  }

}
