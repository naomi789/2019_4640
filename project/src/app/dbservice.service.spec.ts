import { TestBed } from '@angular/core/testing';

import { DBServiceService } from './dbservice.service';

describe('DBServiceService', () => {
  beforeEach(() => TestBed.configureTestingModule({}));

  it('should be created', () => {
    const service: DBServiceService = TestBed.get(DBServiceService);
    expect(service).toBeTruthy();
  });
});
