import { Injectable } from '@angular/core';
import { HttpClient, HttpHeaders } from '@angular/common/http';
import { Observable } from 'rxjs/Observable';
import { Contact } from './contact';

@Injectable()
export class ContactService {

  constructor(private httpClient: HttpClient) { }

  httpOptions = {
    headers: new HttpHeaders({
      'Content-Type': 'application/x-www-form-urlencoded',
      //'Content-Type': 'application/json'
    })
  };

  getContacts(): Observable<Contact[]> {
    return this.httpClient.get<Contact[]>('http://localhost/homework/HW_103/contacts/src/app/shared/contacts.php');
  }

  // addContact(firstName: string, lastName: string, email: string, phone: number) {
  //   return this.httpClient.post<any>('http://localhost/homework/HW_103/contacts/src/app/shared/addContact.php',
  //     `contact= {"firstName":"${firstName}","lastName":"${lastName}","email":"${email}","phone":"${phone}"}`, this.httpOptions)
  // }

  addContact(contact: Contact) {
    return this.httpClient.post<any>('http://localhost/homework/HW_103/contacts/src/app/shared/addContact.php',
      `contact= ${JSON.stringify(contact)}`, this.httpOptions)
  }


}
