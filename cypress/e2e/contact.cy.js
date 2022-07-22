/// <reference types="cypress" />

describe('Test on contact page', () => {
  it('should check if the form exists', () => {
    cy.visit('/contacto');
    cy.get('[data-cy="contactHeading"]').should('exist');
    cy.get('[data-cy="contactHeading"]')
      .invoke('text')
      .should('equal', 'Contacto');
    cy.get('[data-cy="contactHeading"]')
      .invoke('text')
      .should('not.equal', 'Ponte en contacto');

    cy.get('[data-cy="formHeading"]').should('exist');
    cy.get('[data-cy="formHeading"]')
      .invoke('text')
      .should('equal', 'Llene el Formulario de Contacto');
    cy.get('[data-cy="formHeading"]')
      .invoke('text')
      .should('not.equal', 'Ponte en contacto');
  });
});
