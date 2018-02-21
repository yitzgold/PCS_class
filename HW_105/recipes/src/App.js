import React, { Component } from 'react';
import './App.css';
import RecipeList from './recipes-list';

class App extends Component {
  recipes = [
    { name: 'matzoh', ingrediants: ['flour', 'water'], id: 1 },
    { name: 'potato kugel', ingrediants: ['potatoes', 'onion', 'oil', 'salt', 'pepper'], id: 2 },
    { name: 'soup', ingrediants: ['water', 'chicken', 'carrots', 'salt'], id: 3 }
  ];
  render() {
    return (
      <div>
        <RecipeList recipes={this.recipes} />
      </div>
    );
  }
}

export default App;
