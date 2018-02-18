import React, { Component } from 'react';
import logo from './logo.svg';
import './App.css';
import Student from './Student'

class App extends Component {

  constructor(props) {
    super(props);
    this.state = {
      students: [
        { name: 'jon', grades: [78, 98, 90] },
        { name: 'bob', grades: [73, 91, 89] },
      ]
    };
  }

  render() {

    return (
      <div className="App">
        <header className="App-header">
          <img src={logo} className="App-logo" alt="logo" />
          <h1 className="App-title">Welcome to React</h1>
        </header>

        {this.state.students.map((student) => {
          return <Student studentObj={student} />;
        })}

      </div>
    );

  }
}

export default App;
