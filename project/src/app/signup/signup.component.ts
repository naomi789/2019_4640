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

  newUser = new SignUpInfo('', '', '', '');


  senddata(data){
    let params = JSON.stringify(data);

    this.http.post<SignUpInfo>('http://localhost/2019_4640/project/src/app/ngphp-post.php', data).subscribe((data) => {
      console.log('Got data from backend');
      this.newUser = data;
      console.log(this.newUser);
    }, (error)=> {
      console.log('Error', error);
    })

  }

}
