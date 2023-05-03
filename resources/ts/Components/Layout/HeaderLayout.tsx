import React from 'react';
import {
  createStyles,
  Header,
  AppShell,
  Navbar,
  Autocomplete,
  Group,
  Burger,
  rem,
  Button,
  Avatar,
  Transition
} from '@mantine/core';
import { useDisclosure } from '@mantine/hooks';
import { MantineLogo } from '@mantine/ds';

const useStyles = createStyles((theme) => ({
  header: {
    paddingLeft: theme.spacing.md,
    paddingRight: theme.spacing.md
  },

  inner: {
    height: rem(56),
    display: 'flex',
    justifyContent: 'space-between',
    alignItems: 'center'
  },

  links: {
    [theme.fn.smallerThan('md')]: {
      display: 'none'
    }
  },

  search: {
    [theme.fn.smallerThan('xs')]: {
      display: 'none'
    }
  },

  link: {
    display: 'block',
    lineHeight: 1,
    padding: `${rem(8)} ${rem(12)}`,
    borderRadius: theme.radius.sm,
    textDecoration: 'none',
    color:
      theme.colorScheme === 'dark'
        ? theme.colors.dark[0]
        : theme.colors.gray[7],
    fontSize: theme.fontSizes.sm,
    fontWeight: 500,

    '&:hover': {
      backgroundColor:
        theme.colorScheme === 'dark'
          ? theme.colors.dark[6]
          : theme.colors.gray[0]
    }
  }
}));

interface HeaderLayoutProps {
  links: { link: string; label: string }[];
  user?: any;
  isLogin: boolean;
  children: React.ReactElement;
}

function HeaderLayout({ links, user, isLogin, children }: HeaderLayoutProps) {
  const [opened, { toggle }] = useDisclosure(false);
  const { classes } = useStyles();

  const items = links.map((link) => (
    <a
      key={link.label}
      href={link.link}
      className={classes.link}
      onClick={(event) => event.preventDefault()}
    >
      {link.label}
    </a>
  ));

  return (
    <>
      <Header height={56} className={classes.header} mb={10}>
        <div className={classes.inner}>
          <Group>
            <MantineLogo size={28} />
          </Group>
          <Group>
            <Group ml={50} spacing={5} className={classes.links}>
              {items}
            </Group>
            {isLogin ? (
              <>
                <Avatar src={user.picture} radius="xl" />
                <Button component="a" href="logout">
                  サインアウト
                </Button>
              </>
            ) : (
              <Button component="a" href="login">
                サインイン
              </Button>
            )}
          </Group>
        </div>
      </Header>
    </>
  );
}

HeaderLayout.defaultProps = {
  user: {}
};

export default HeaderLayout;
