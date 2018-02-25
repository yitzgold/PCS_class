import React, { Component } from 'react';
//import update from 'react-addons-update';
import RecipeList from './RecipesList';
import AddRecipe from './AddRecipe';

export default class RecipeBook extends Component {
    constructor(props) {
        super(props);
        this.state = {
            recipes: [
                { name: 'matzoh', instructions: 'mix flour, water', picture: 'matzoh.jpg' },
                { name: 'potato kugel', instructions: 'mix potatoes, onions, oil, salt, pepper', picture: 'potatoKugel.jpg' },
                { name: 'soup', instructions: 'mix water, chicken, carrots, salt', picture: 'chickenSoup.jpg' }
            ]
        };
    }

    addRecipe = (name, instructions) => {
        this.setState({ recipes: [...this.state.recipes, { name, instructions }] });
    }

    render() {
        return (
            <div>
                <RecipeList recipes={this.state.recipes} />
                <AddRecipe addRecipe={this.addRecipe} />
            </div>
        );
    }
}

