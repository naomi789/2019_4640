import { ViewChild } from '@angular/core';
import { NgForm } from '@angular/forms';

export class SignUpInfo {

    @ViewChild('signUpForm', {static: false}) signUpForm: NgForm;
    
    constructor(
        public name: string,
        public email: string,
        public pwd: string,
        public confirmPwd: string
    ){}

}
