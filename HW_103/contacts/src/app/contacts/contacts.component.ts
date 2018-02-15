import { Component, OnInit } from '@angular/core';
import { Observable } from 'rxjs/Observable';
import { ContactService } from '../shared/contact.service';
import { Contact } from '../shared/contact';

@Component({
  selector: 'app-contacts',
  templateUrl: './contacts.component.html',
  styleUrls: ['./contacts.component.css']
})
export class ContactsComponent implements OnInit {

  public contacts: Observable<Contact[]>;

  constructor(private blogsService: ContactService) { }

  ngOnInit() {
    this.contacts = this.blogsService.getContacts();
  }

}