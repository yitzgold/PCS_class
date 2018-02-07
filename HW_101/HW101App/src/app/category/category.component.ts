import { Component, OnInit, Input } from '@angular/core';
import { Category } from '../shared/category';

@Component({
  selector: 'app-category',
  templateUrl: './category.component.html',
  styleUrls: ['./category.component.css']
})
export class CategoryComponent implements OnInit {
  @Input()
  category: Category;

  addItem(name: string, price: number) {
    if (!this.category.items) {
      this.category.items = [];
    }
    this.category.items.push({ name: name, price: price });
  }
  constructor() { }

  ngOnInit() {
  }

}
