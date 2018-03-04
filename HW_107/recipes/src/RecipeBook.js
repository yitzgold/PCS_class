import React, { Component } from 'react';
import { Link, Switch, Route, Redirect } from 'react-router-dom';
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
                <h1>Recipes</h1>
                <Link to="/recipes">Recipe List</Link> | <Link to="/addRecipe">addRecipe</Link>
                <hr />
                <Switch>
                    <Route path="/recipes" render={() => <RecipeList recipes={this.state.recipes} />} />
                    <Route path="/addRecipe" render={() => <AddRecipe addRecipe={this.addRecipe} />} />
                    <Redirect exact from="/" to="/recipes" />
                    <Route render={() => <div>404</div>} />
                </Switch>
            </div>
        );
    }
}

