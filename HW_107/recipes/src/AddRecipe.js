import React, { Component } from 'react';
import { Redirect } from 'react-router-dom';

export default class AddRecipe extends Component {

    constructor(props) {
        super(props);
        this.state = { submitted: false, name: null, instructions: null };
    }

    handleInputChange = (event) => {
        const target = event.target;
        const value = target.value;
        const name = target.name;

        this.setState({
            [name]: value
        });
    }

    handleSubmit = (event) => {
        event.preventDefault();
        this.props.addRecipe(this.state.name, this.state.instructions);
        this.setState({ submitted: true });
    }

    render() {

        return (
            <div>
                <h2>Add Recipe</h2>
                <form onSubmit={this.handleSubmit}>
                    <label>
                        Name:
                    <input
                            name="name"
                            onChange={this.handleInputChange} />
                    </label>
                    <br />
                    <label>
                        Instructions:
                    <input
                            name="instructions"
                            onChange={this.handleInputChange} />
                    </label>
                    <input type="submit" value="Add" />
                </form>
                {this.state.submitted === true &&
                    <Redirect to="/recipes" />}
            </div>
        );
    }
} 