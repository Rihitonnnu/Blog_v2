import React from 'react';
import HeaderLayout from './HeaderLayout';
import { AppShell, Navbar, Header } from '@mantine/core';

type PageProps = {
  title: string;
  children: React.ReactElement;
  isLogin?: boolean;
  user?: any;
};

const HeaderItem = [
  {
    link: 'http://localhost/articles',
    label: '記事一覧'
  }
];

function Layout({ title, children, isLogin = false, user }: PageProps) {
  return (
    <>
      <HeaderLayout
        links={HeaderItem}
        user={user}
        isLogin={isLogin}
        children={children}
      />
    </>
  );
}

Layout.defaultProps = {
  isLogin: false,
  user: {}
};

export default Layout;
