import React, {Component} from "react";
import { connect } from "react-redux";

const mapStateToProps = state => {
    return {articles: state.articles}
};

class ArticleList extends Component{

    render() {
        const articles = this.props.articles;
        return <ul>{articles.map(el => <li key={el.id}>{el.title}</li>)}</ul>
    }
}

export default connect(mapStateToProps)(ArticleList);