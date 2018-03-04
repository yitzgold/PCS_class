import React, { Component } from 'react';

export default class RecipeDetails extends Component {

    constructor(props) {
        super(props)
        this.state = { showDetails: false, mouseEnter: false };
    }

    toggleDetails = () => {
        this.setState({ showDetails: !this.state.showDetails });
    }

    mouseEnter = () => {
        this.setState({ mouseEnter: true });
    }

    mouseExit = () => {
        this.setState({ mouseEnter: false });
    }


    render() {
        const { name, instructions, picture } = this.props.recipe;
        const details = this.state.showDetails ? <img style={{ width: 250 }} src={picture} alt={name} /> : null;
        let style = this.state.mouseEnter ? { background: 'yellow' } : null;
        return (
            <div>
                <h2>Recipe Name: {name}</h2>
                <h3>Instructions:</h3>
                <p>{instructions}</p>
                <div style={style} onMouseEnter={this.mouseEnter} onMouseLeave={this.mouseExit} onClick={this.toggleDetails}>
                    click {this.state.showDetails ? 'to hide' : 'for more details'}
                    {details}
                </div>
            </div>
        )
    }
}