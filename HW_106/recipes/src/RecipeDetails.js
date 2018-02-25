import React, { Component } from 'react';

export default class RecipeDetails extends Component {

    constructor(props) {
        super(props)
        this.state = { showDetails: false, mouseEnter: false, style: null };
    }

    toggleDetails = () => {
        this.setState({ showDetails: !this.state.showDetails });
    }

    toggleMouseEnter = () => {
        this.setState({ mouseEnter: !this.state.mouseEnter }, () => {
            let style = this.state.mouseEnter ? { background: 'yellow' } : null;
            this.setState({ style: style });
        });
    }

    render() {
        const { name, instructions, picture } = this.props.recipe;
        const details = this.state.showDetails ? <img style={{ width: 250 }} src={picture} alt={name} /> : null;

        return (
            <div>
                <h2>Recipe Name: {name}</h2>
                <h3>Instructions:</h3>
                <p>{instructions}</p>
                <div style={this.state.style} onMouseEnter={this.toggleMouseEnter} onMouseLeave={this.toggleMouseEnter} onClick={this.toggleDetails}>
                    click {this.state.showDetails ? 'to hide' : 'for more details'}
                    {details}
                </div>
            </div>
        )
    }
}