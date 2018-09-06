import React, {Component} from "react";
import { connect } from "react-redux";

const mapStateToProps = state => {
    return {articles: state.articles}
};

class ArticleList extends Component{

    render() {
        const articles = this.props.articles;
        return (
            <div>
                <h2>List</h2>
                <ul>{articles.map(el => <li key={el.id}>{el.title}</li>)}</ul>
            </div>
        )
    }
}

export default connect(mapStateToProps)(ArticleList);