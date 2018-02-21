import React, { Component } from 'react';

export default class RecipeDetails extends Component {

    render() {
        const { name, ingrediants } = this.props.recipe,
            ingrediantLIs = ingrediants.map((ingrediant) => {
                return <li key={ingrediant.toString()}>{ingrediant}</li>;
            });

        return (
            <div>
                <h2>Recipe Name: {name}</h2>
                <h3>Ingrediants:</h3>
                <ul>
                    {ingrediantLIs}
                </ul>
            </div>
        );
    }
}