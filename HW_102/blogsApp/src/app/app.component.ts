import { Component, Input } from '@angular/core';
import { Blog } from './shared/blog'

@Component({
  selector: 'app-root',
  templateUrl: './app.component.html',
  styleUrls: ['./app.component.css']
})
export class AppComponent {

  title = 'OUR BLOGS';

  blogs: Blog[] = [
    {
      name: 'riki', posts: [
        { title: 'about riki', body: 'riki is nice' }, { title: `riki's hobbies`, body: 'reading, baking, and playing' }
      ]
    },
    {
      name: 'chavi', posts: [
        { title: 'about Chavi', body: 'chavi is so nice' }, { title: `chavi's hobbies`, body: 'readding, swimming, playing school' }
      ]
    },
    {
      name: 'sari', posts: [
        { title: 'about Sari', body: 'sari is a artist' }, { title: 'more about Sari', body: 'Sari is so cute' }
      ]
    }
  ];

  showBlogs: boolean = true;

  selectedBlog;

  show(index) {
    this.showBlogs = false;
    this.selectedBlog = this.blogs[index];
    console.log(this.blogs[index]);
  }

  backToBlogs() {
    this.showBlogs = true;
  }

}
