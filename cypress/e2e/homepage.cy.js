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
});
