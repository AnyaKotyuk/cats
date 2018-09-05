import React, { Component } from 'react';
// import logo from './logo.svg';
import './App.css';
import ArticleList from "./components/articleList";
import ArticleForm from "./components/articleForm";

class App extends Component {

    constructor(props) {
        super(props);
        this.state = {
            inputValue: '',
            articles: []
        };
        this.handleChange = this.handleChange.bind(this);
        this.handleBlur = this.handleBlur.bind(this);
    }

    handleBlur(e) {

        var state = this.state;

        if (state.inputValue == '') return;

        var idIncrement = 1;
        if (state.articles.length > 0) {
            var lastEl = state.articles[state.articles.length-1];
            idIncrement = lastEl.id+1
        }
        var newArticle = {
            title: e.target.value,
            id: idIncrement
        };

        this.setState(prevState => ({
            inputValue: '',
            articles: prevState.articles.concat(newArticle)
        }));
    }

    handleChange(e) {
        var state = this.state;
        state.inputValue = e.target.value;
        this.setState(state);
    }

    render() {
        return (
          <div className="App">
            <header className="App-header">
              {/*<img src={logo} className="App-logo" alt="logo" />*/}
              <h1 className="App-title">Welcome to React</h1>
            </header>
            <p className="App-intro">
              To get started, edit <code>src/App.js</code> and save to reload.
            </p>
              <ArticleForm handleBlur={this.handleBlur} handleChange={this.handleChange} value={this.state.inputValue}/>
              <ArticleList articles={this.state.articles}/>
          </div>
        );
    }
}

export default App;
