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

  it('Test the card structure for the properties announcements', () => {
    cy.get('[data-cy="adCard"]').should('have.length', 3);
    cy.get('[data-cy="adCard"]').should('not.have.length', 1);
    cy.get('[data-cy="adCard"]').should('not.have.length', 5);

    cy.get('[data-cy="adInfoLink"]').should('have.class', 'btnYellow-block');
    cy.get('[data-cy="adInfoLink"]').should('not.have.class', 'btnYellow');
    cy.get('[data-cy="adInfoLink"]')
      .first()
      .invoke('text')
      .should('equal', 'Ver propiedad');
    cy.get('[data-cy="adInfoLink"]').first().click();
    cy.url().should('include', '/anuncio');
    cy.get('[data-cy="estateTitle"]').should('exist');

    cy.wait(450);
    cy.go('back');
  });

  it('Test the routing between estates announcements', () => {
    cy.get('[data-cy="viewAllAds"]').should('exist');
    cy.get('[data-cy="viewAllAds"]').should('have.class', 'btnGreen');
    cy.get('[data-cy="viewAllAds"]')
      .invoke('attr', 'href')
      .should('equal', '/anuncios');
    cy.get('[data-cy="viewAllAds"]').click();
    cy.url().should('include', '/anuncios');
    cy.get('[data-cy="adListHeading"]')
      .invoke('text')
      .should('equal', 'Casas y Departamentos en Venta');
    cy.wait(450);
    cy.go('back');
  });

  it('Test the contact image block on home page', () => {
    cy.get('[data-cy="contactImage"]').should('exist');
    cy.get('[data-cy="contactImage"]')
      .find('H2')
      .invoke('text')
      .should('equal', 'Encuentra la casa de tus sueños');

    cy.get('[data-cy="contactImage"]')
      .find('p')
      .invoke('text')
      .should(
        'equal',
        'Llena el formulario de contacto y un asesor se pondrá en contacto contigo a la brevedad'
      );

    cy.get('[data-cy="contactImage"]')
      .find('a')
      .invoke('attr', 'href')
      .then(href => {
        cy.visit(href);
      });
    cy.get('[data-cy="contactHeading"]').should('exist');
    cy.wait(450);
    cy.visit('/');
  });
});
