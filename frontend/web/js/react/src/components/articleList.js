import React, {Component} from "react";

class ArticleList extends Component{

    constructor(props) {
        super(props);
    }

    render() {
        const articles = this.props.articles;
        return <ul>{articles.map(el => <li key={el.id}>{el.title}</li>)}</ul>
    }
}

export default ArticleList;