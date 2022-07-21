/// <reference types="cypress" />

describe('Testing on Real Estate homepage', () => {
  it('Test the hero', () => {
    cy.visit('/');

    cy.get('[data-cy="hero-title"]').should('exist');
    cy.get('[data-cy="hero-title"]')
      .invoke('text')
      .should('equal', 'Venta de Casas y Departamentos Exclusivos de Lujo');
    cy.get('[data-cy="hero-title"]')
      .invoke('text')
      .should('not.equal', 'Real Estate');
  });

  it('Test the about us section', () => {
    cy.get('[data-cy="aboutUs-title"]').should('exist');
    cy.get('[data-cy="aboutUs-title"]')
      .should('have.prop', 'tagName')
      .should('equal', 'H2');

    cy.get('[data-cy="aboutUs-icons"]').should('exist');
    cy.get('[data-cy="aboutUs-icons"]').find('.icon').should('have.length', 3);
    cy.get('[data-cy="aboutUs-icons"]')
      .find('.icon')
      .should('not.have.length', 4);
  });
});
