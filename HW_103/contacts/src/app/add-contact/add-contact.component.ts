import { Component, OnInit, Input } from '@angular/core';
import { ContactService } from '../shared/contact.service';
import { ContactsComponent } from '../contacts/contacts.component';
import { Contact } from '../shared/contact';
import { Subscription } from 'rxjs/Subscription';

@Component({
  selector: 'app-add-contact',
  templateUrl: './add-contact.component.html',
  styleUrls: ['./add-contact.component.css']
})
export class AddContactComponent implements OnInit {

  constructor(private blogsService: ContactService) { }

  ngOnInit() {

  }

  addContact(contact: Contact) {
    this.blogsService.addContact(contact).subscribe(result => {
      console.log(result);
    });
  }
}
