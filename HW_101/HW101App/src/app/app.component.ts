import { Component } from '@angular/core';
import { Category } from './shared/category';

@Component({
  selector: 'app-root',
  templateUrl: './app.component.html',
  styleUrls: ['./app.component.css']
})
export class AppComponent {
  title = 'HW101App';

  categorys: Category[] = [
    { name: "balls", items: [{ name: "Baseball", price: 5.99 }, { name: "Football", price: 10 }] },
    { name: "candy", items: [{ name: "Gum", price: .99 }, { name: "Taffy", price: .50 }] },
    { name: "shoes" }
  ];

  selectedCategory: Category;

}