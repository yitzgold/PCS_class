import React, { Component } from 'react';
import RecipeDetails from './recipe-details';

export default class RecipesList extends Component {

    constructor(props) {
        super(props);
        this.state = { selectedRecipe: null };
    }

    /*handleClick = (index) => {
        return () => {
            this.setState({ selectedRecipe: this.props.recipes[index] })
        }
    }*/

    render() {
        const recipeLIs = this.props.recipes.map((recipe, index) => {
            return <li key={recipe.id} onClick={() => this.setState({ selectedRecipe: this.props.recipes[index] })}>{recipe.name}</li>;
        });

        /*const recipeLIs = this.props.recipes.map((recipe, index) => {
            return <li key={recipe.id} onClick={this.handleClick(index)}>{recipe.name}</li>;
        });*/

        return (
            <div>
                <h1>Recipes</h1>
                <h2>Choose a Recipe</h2>
                <ul className='recipeUl'>
                    {recipeLIs}
                </ul>
                <hr />
                {this.state.selectedRecipe &&
                    <RecipeDetails recipe={this.state.selectedRecipe} />
                }
            </div>
        );
    }
} 