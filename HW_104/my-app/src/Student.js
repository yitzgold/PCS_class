import React, { Component } from 'react';
import './Student.css';

export default class Student extends Component {

    render() {
        return (
            <div>
                <h1>Student Name: {this.props.studentObj.name}</h1>
                <h2>Grades:</h2>
                <ul>
                    {this.props.studentObj.grades.map((grade, index) => {
                        return <li key={index}>{grade}</li>;
                    })}
                </ul>
                <hr />
            </div>
        );
    }
}