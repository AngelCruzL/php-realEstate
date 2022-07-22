/// <reference types="cypress" />

describe('Test the authentication', () => {
  it('should test the login form alerts', () => {
    cy.visit('/login');

    cy.get('[data-cy="loginHeading"]').should('exist');
    cy.get('[data-cy="loginHeading"]').should('have.text', 'Iniciar Sesión');
    cy.get('[data-cy="loginHeading"]').should('not.have.text', 'Login');

    cy.get('[data-cy="loginForm"]').should('exist');

    cy.get('[data-cy="loginForm"]').submit();
    cy.get('[data-cy="loginErrorAlert"]').should('exist');
    cy.get('[data-cy="loginErrorAlert"]')
      .eq(0)
      .should('have.class', 'alertError');
    cy.get('[data-cy="loginErrorAlert"]')
      .eq(0)
      .find('p')
      .should('have.text', 'El correo es obligatorio o no es válido');
    cy.get('[data-cy="loginErrorAlert"]')
      .eq(1)
      .should('have.class', 'alertError');
    cy.get('[data-cy="loginErrorAlert"]')
      .eq(1)
      .find('p')
      .should('have.text', 'La contraseña es obligatoria');
  });

  it('should test if the user not exists', () => {
    cy.get('[data-cy="inputEmail"]').should('exist');
    cy.get('[data-cy="inputEmail"]').type('test@notexists.com');
    cy.get('[data-cy="inputPassword"]').type('123456');

    cy.get('[data-cy="loginForm"]').submit();

    cy.get('[data-cy="loginErrorAlert"]')
      .eq(0)
      .should('have.class', 'alertError');
    cy.get('[data-cy="loginErrorAlert"]')
      .eq(0)
      .find('p')
      .should('have.text', 'El usuario no existe');
  });

  it('should test if the password is wrong', () => {
    cy.wait(500);

    cy.get('[data-cy="inputEmail"]').type('test@test.com');
    cy.get('[data-cy="inputPassword"]').type('password');

    cy.get('[data-cy="loginForm"]').submit();

    cy.get('[data-cy="loginErrorAlert"]')
      .eq(0)
      .should('have.class', 'alertError');
    cy.get('[data-cy="loginErrorAlert"]')
      .eq(0)
      .find('p')
      .should('have.text', 'La contraseña no es correcta');
  });

  it('should test a successful login', () => {
    cy.wait(500);

    cy.get('[data-cy="inputEmail"]').type('test@test.com');
    cy.get('[data-cy="inputPassword"]').type('123456');

    cy.get('[data-cy="loginForm"]').submit();

    cy.get('[data-cy="adminHeading"]').should('exist');
    cy.get('[data-cy="adminHeading"]').should(
      'have.text',
      'Administrador de bienes raíces'
    );
    cy.get('[data-cy="adminHeading"]').should(
      'not.have.text',
      'Administrador de bienes raices'
    );

    cy.wait(1500);
    cy.visit('/login');
  });
});
