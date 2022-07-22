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
});
