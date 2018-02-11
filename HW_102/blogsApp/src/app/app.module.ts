import { BrowserModule } from '@angular/platform-browser';
import { NgModule } from '@angular/core';


import { AppComponent } from './app.component';
import { BlogComponent } from './blog/blog.component';
import { PostComponent } from './post/post.component';



@NgModule({
  declarations: [
    AppComponent,
    BlogComponent,
    PostComponent

  ],
  imports: [
    BrowserModule
  ],
  providers: [],
  bootstrap: [AppComponent]
})
export class AppModule { }
