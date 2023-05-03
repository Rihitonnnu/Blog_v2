import React from 'react';
import Layout from '@/Components/Layouts/Layout';

type ArticleListPageProps = {
  articles: any;
  user: any;
  isLogin: boolean;
};

function ArticleListPage({ articles, user, isLogin }: ArticleListPageProps) {
  return (
    <Layout title="投稿一覧" user={user} isLogin={isLogin}>
      {articles.data.map((article) => (
        <div>
          <p>{article.title}</p>
        </div>
      ))}
    </Layout>
  );
}

export default ArticleListPage;
