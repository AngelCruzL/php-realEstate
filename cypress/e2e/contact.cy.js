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
    cy.get('[data-cy="contactForm"]').should('exist');
  });

  it('should fill the form inputs', () => {
    cy.get('[data-cy="inputName"]').type('Luis Lara');
    cy.get('[data-cy="inputMessage"]').type('Deseo comprar una casa');
    cy.get('[data-cy="inputOptions"]').select('Comprar');
    cy.get('[data-cy="inputBudget"]').type(1200000);
    cy.get('[data-cy="checkContact"]').eq(0).check();
    cy.get('[data-cy="inputPhone"]').should('exist');
    cy.get('[data-cy="inputPhone"]').type('521468354');
    cy.get('[data-cy="inputDate"]').type('2022-01-10');
    cy.get('[data-cy="inputHour"]').type('09:00');
    cy.wait(1000);

    cy.get('[data-cy="checkContact"]').eq(1).check();
    cy.get('[data-cy="inputEmail"]').should('exist');
    cy.get('[data-cy="inputEmail"]').type('email@test.com');
  });

  it('should check if the form was sent', () => {
    cy.get('[data-cy="contactForm"]').submit();

    cy.get('[data-cy="formSubmitAlert"]').should('exist');
    cy.get('[data-cy="formSubmitAlert"]')
      .should('have.class', 'alert')
      .and('have.class', 'alertSuccess')
      .and('not.have.class', 'alertError');
    cy.get('[data-cy="formSubmitAlert"]')
      .find('p')
      .invoke('text')
      .should('not.equal', 'Su mensaje ha sido enviado correctamente');
    cy.get('[data-cy="formSubmitAlert"]')
      .find('p')
      .invoke('text')
      .should('equal', 'Mensaje enviado correctamente');
  });
});
