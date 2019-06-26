import { async, ComponentFixture, TestBed } from '@angular/core/testing';

import { ListOfListsComponent } from './list-of-lists.component';

describe('ListOfListsComponent', () => {
  let component: ListOfListsComponent;
  let fixture: ComponentFixture<ListOfListsComponent>;

  beforeEach(async(() => {
    TestBed.configureTestingModule({
      declarations: [ ListOfListsComponent ]
    })
    .compileComponents();
  }));

  beforeEach(() => {
    fixture = TestBed.createComponent(ListOfListsComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
