    <?php include_once 'includes/header.php'; ?>
    <?php if ($isAdmin) : ?>
        <div class="container mAdminContainer" *ngIf="secret">
            <div class="row mAdminContainer">
                <div class="col-xs-12 mAdminContainer">
                    <form #f="ngForm" (ngSubmit)="1" class="example-form mform mAdminContainer">
                        <h1 class="lead">Kies een actie</h1>
                        <pre [@bounceOnEnter] [@bounceOutOnLeave] *ngIf="isBackendDown" style="color: red">Krijg je niks? Laad de pagina opnieuw... (F5)</pre>
                        <div class="container">
                            <div *ngIf="!wantsToEdit&&!wantsToAdd&&!wantsToPO&&!wantsToGR&&!wantsToSalesRep">
                                <mat-grid-list cols="2" rowHeight="2:1">
                                    <mat-card class="example-card whiteish">
                                        <mat-card-title-group class="whiteish">
                                            <mat-card-subtitle class="whiteish">Manage</mat-card-subtitle>
                                            <mat-card-title class="whiteish">Klant</mat-card-title>
                                            <svg class="msvg" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 512">
                                                <!--! Font Awesome Pro 6.1.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2022 Fonticons, Inc. -->
                                                <path d="M496 224C416.4 224 352 288.4 352 368s64.38 144 144 144s144-64.38 144-144S575.6 224 496 224zM544 384h-54.25C484.4 384 480 379.6 480 374.3V304C480 295.2 487.2 288 496 288C504.8 288 512 295.2 512 304V352h32c8.838 0 16 7.162 16 16C560 376.8 552.8 384 544 384zM320.1 352H208C199.2 352 192 344.8 192 336V288H0v144C0 457.6 22.41 480 48 480h312.2C335.1 449.6 320 410.5 320 368C320 362.6 320.5 357.3 320.1 352zM496 192c5.402 0 10.72 .3301 16 .8066V144C512 118.4 489.6 96 464 96H384V48C384 22.41 361.6 0 336 0h-160C150.4 0 128 22.41 128 48V96H48C22.41 96 0 118.4 0 144V256h360.2C392.5 216.9 441.3 192 496 192zM336 96h-160V48h160V96z" />
                                            </svg>
                                        </mat-card-title-group>
                                        <mat-card-content>
                                            <p class="whiteish">Alles wat te maken heeft met klanten</p>
                                        </mat-card-content>
                                        <mat-divider inset></mat-divider>
                                        <mat-card-actions class="whiteish">
                                            <button class="mbutton" (click)="onUserWantsToEdit()" type="button" mat-raised-button color="accent">Klant
                                                Aanpassen</button>
                                            <button class="mbutton" (click)="onUserWantsToAdd()" type="button" mat-raised-button color="accent">Klant
                                                Toevoegen</button>
                                        </mat-card-actions>
                                        <mat-card-footer>
                                            <mat-progress-bar mode="buffer"></mat-progress-bar>
                                        </mat-card-footer>
                                    </mat-card>
                                    <mat-card class="example-card whiteish">
                                        <mat-card-title-group class="whiteish">
                                            <mat-card-subtitle class="whiteish">Manage</mat-card-subtitle>
                                            <mat-card-title class="whiteish">PO-GR</mat-card-title>
                                            <svg class="msvg" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512">
                                                <!--! Font Awesome Pro 6.1.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2022 Fonticons, Inc. -->
                                                <path d="M448 336v-288C448 21.49 426.5 0 400 0H96C42.98 0 0 42.98 0 96v320c0 53.02 42.98 96 96 96h320c17.67 0 32-14.33 32-31.1c0-11.72-6.607-21.52-16-27.1v-81.36C441.8 362.8 448 350.2 448 336zM143.1 128h192C344.8 128 352 135.2 352 144C352 152.8 344.8 160 336 160H143.1C135.2 160 128 152.8 128 144C128 135.2 135.2 128 143.1 128zM143.1 192h192C344.8 192 352 199.2 352 208C352 216.8 344.8 224 336 224H143.1C135.2 224 128 216.8 128 208C128 199.2 135.2 192 143.1 192zM384 448H96c-17.67 0-32-14.33-32-32c0-17.67 14.33-32 32-32h288V448z" />
                                            </svg>
                                        </mat-card-title-group>
                                        <mat-card-content>
                                            <p class="whiteish">Alles wat te maken heeft met Purchase Orders</p>
                                        </mat-card-content>
                                        <mat-divider inset></mat-divider>
                                        <mat-card-actions class="whiteish">
                                            <button (click)="onUserWantsToPO()" type="button" mat-raised-button color="accent">Po Nr.</button>
                                            <button (click)="onUserWantsToGR()" type="button" mat-raised-button color="accent">Gr. Nr.</button>
                                        </mat-card-actions>
                                        <mat-card-footer>
                                            <mat-progress-bar mode="buffer"></mat-progress-bar>
                                        </mat-card-footer>
                                    </mat-card>
                                    <mat-card class="example-card whiteish">
                                        <mat-card-title-group class="whiteish">
                                            <mat-card-subtitle class="whiteish">Manage</mat-card-subtitle>
                                            <mat-card-title class="whiteish">E-Team</mat-card-title>
                                            <svg class="msvg" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                                                <!--! Font Awesome Pro 6.1.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2022 Fonticons, Inc. -->
                                                <path d="M256.1 246c-13.25 0-23.1 10.75-23.1 23.1c1.125 72.25-8.124 141.9-27.75 211.5C201.7 491.3 206.6 512 227.5 512c10.5 0 20.12-6.875 23.12-17.5c13.5-47.87 30.1-125.4 29.5-224.5C280.1 256.8 269.4 246 256.1 246zM255.2 164.3C193.1 164.1 151.2 211.3 152.1 265.4c.75 47.87-3.75 95.87-13.37 142.5c-2.75 12.1 5.624 25.62 18.62 28.37c12.1 2.625 25.62-5.625 28.37-18.62c10.37-50.12 15.12-101.6 14.37-152.1C199.7 238.6 219.1 212.1 254.5 212.3c31.37 .5 57.24 25.37 57.62 55.5c.8749 47.1-2.75 96.25-10.62 143.5c-2.125 12.1 6.749 25.37 19.87 27.62c19.87 3.25 26.75-15.12 27.5-19.87c8.249-49.1 12.12-101.1 11.25-151.1C359.2 211.1 312.2 165.1 255.2 164.3zM144.6 144.5C134.2 136.1 119.2 137.6 110.7 147.9C85.25 179.4 71.38 219.3 72 259.9c.6249 37.62-2.375 75.37-8.999 112.1c-2.375 12.1 6.249 25.5 19.25 27.87c20.12 3.5 27.12-14.87 27.1-19.37c7.124-39.87 10.5-80.62 9.749-121.4C119.6 229.3 129.2 201.3 147.1 178.3C156.4 167.9 154.9 152.9 144.6 144.5zM253.1 82.14C238.6 81.77 223.1 83.52 208.2 87.14c-12.87 2.1-20.87 15.1-17.87 28.87c3.125 12.87 15.1 20.75 28.1 17.75C230.4 131.3 241.7 130 253.4 130.1c75.37 1.125 137.6 61.5 138.9 134.6c.5 37.87-1.375 75.1-5.624 113.6c-1.5 13.12 7.999 24.1 21.12 26.5c16.75 1.1 25.5-11.87 26.5-21.12c4.625-39.75 6.624-79.75 5.999-119.7C438.6 165.3 355.1 83.64 253.1 82.14zM506.1 203.6c-2.875-12.1-15.51-21.25-28.63-18.38c-12.1 2.875-21.12 15.75-18.25 28.62c4.75 21.5 4.875 37.5 4.75 61.62c-.1249 13.25 10.5 24.12 23.75 24.25c13.12 0 24.12-10.62 24.25-23.87C512.1 253.8 512.3 231.8 506.1 203.6zM465.1 112.9c-48.75-69.37-128.4-111.7-213.3-112.9c-69.74-.875-134.2 24.84-182.2 72.96c-46.37 46.37-71.34 108-70.34 173.6l-.125 21.5C-.3651 281.4 10.01 292.4 23.26 292.8C23.51 292.9 23.76 292.9 24.01 292.9c12.1 0 23.62-10.37 23.1-23.37l.125-23.62C47.38 193.4 67.25 144 104.4 106.9c38.87-38.75 91.37-59.62 147.7-58.87c69.37 .1 134.7 35.62 174.6 92.37c7.624 10.87 22.5 13.5 33.37 5.875C470.1 138.6 473.6 123.8 465.1 112.9z" />
                                            </svg>
                                        </mat-card-title-group>
                                        <mat-card-content>
                                            <p class="whiteish">Alles wat te maken heeft met medewerkers</p>
                                        </mat-card-content>
                                        <mat-divider inset></mat-divider>
                                        <mat-card-actions class="whiteish">
                                            <button (click)="onUserWantsToSalesRep()" type="button" mat-raised-button color="accent">Edit Sales
                                                Rep
                                                List</button>
                                        </mat-card-actions>
                                        <mat-card-footer>
                                            <mat-progress-bar mode="buffer"></mat-progress-bar>
                                        </mat-card-footer>
                                    </mat-card>
                                </mat-grid-list>
                            </div>
                            <div *ngIf="wantsToAdd">
                                <mat-form-field [@fadeInLeftOnEnter] class="example-full-width" appearance="fill">
                                    <mat-label>Nieuwe gegevens Klant</mat-label>
                                    <input required type="text" placeholder="Pick one" aria-label="Number" matInput #edit_klantnaam="ngModel" [(ngModel)]="u_new_klantnaam" name="u_edit_klantnaam">
                                </mat-form-field>
                                <button (click)="onUserAddClick()" [disabled]="!f.valid" type="button" mat-raised-button color="primary">Toevoegen</button>
                                <pre [@bounceOnEnter] [@bounceOutOnLeave] *ngIf="isBezig" style="color: white;background: black;">Bezig... ({{s}}s)</pre>
                            </div>
                            <mat-form-field [@fadeInLeftOnEnter] *ngIf="wantsToEdit" class="example-full-width" appearance="fill">
                                <mat-label>{{'q5'|translate}}</mat-label>
                                <input required type="text" placeholder="Pick one" aria-label="Number" matInput #klantnaam [(ngModel)]="u_klantnaam" name="u_klantnaam" [formControl]="myControl2" [matAutocomplete]="auto2">
                                <mat-autocomplete #auto2="matAutocomplete">
                                    <mat-option *ngFor="let klant of filteredOptions2 | async" [value]="klant">
                                        {{klant}}
                                    </mat-option>
                                </mat-autocomplete>
                            </mat-form-field>
                            <div *ngIf="isKlant">
                                <h3>Wat wil je doen?</h3>
                                <div *ngIf="isEditing">
                                    <mat-form-field [@fadeInLeftOnEnter] class="example-full-width" appearance="fill">
                                        <mat-label>Nieuwe gegevens Klant</mat-label>
                                        <input required type="text" placeholder="Pick one" aria-label="Number" matInput #edit_klantnaam="ngModel" [(ngModel)]="u_new_klantnaam" name="u_edit_klantnaam">
                                    </mat-form-field>
                                    <button (click)="onUserEditClick()" [disabled]="!f.valid" type="button" mat-raised-button color="primary">Verzenden</button>
                                </div>
                                <button (click)="onUserClick()" [disabled]="!f.valid" type="button" mat-raised-button color="accent">Aanpassen</button>
                                <button (click)="onUserDeleteClick()" [disabled]="!f.valid" type="button" mat-raised-button color="warn">Verwijderen</button>
                                <pre [@bounceOnEnter] [@bounceOutOnLeave] *ngIf="isBezig" style="color: white;background: black;">Bezig... ({{s}}s)</pre>
                            </div>
                            <!-- PO -->
                            <mat-form-field [@fadeInLeftOnEnter] *ngIf="wantsToPO" class="example-full-width" appearance="fill">
                                <mat-label>Enter ID</mat-label>
                                <input required type="text" placeholder="Pick one" aria-label="Number" matInput #klantnaam [(ngModel)]="u_ID" name="u_ID" [formControl]="myControl3" [matAutocomplete]="auto3">
                                <mat-autocomplete #auto3="matAutocomplete">
                                    <mat-option *ngFor="let ID of filteredOptions3 | async" [value]="ID">
                                        {{ID}}
                                    </mat-option>
                                </mat-autocomplete>
                            </mat-form-field>
                            <div *ngIf="isID">
                                <h3>Wat wil je doen?</h3>
                                <div *ngIf="isPOEditing">
                                    <mat-form-field [@fadeInLeftOnEnter] class="example-full-width" appearance="fill">
                                        <mat-label>PO Nr</mat-label>
                                        <input required type="text" placeholder="Pick one" aria-label="Number" matInput #edit_klantnaam="ngModel" [(ngModel)]="u_new_klantnaam" name="u_edit_klantnaam">
                                    </mat-form-field>
                                    <button (click)="onUserPOEditClick()" [disabled]="!f.valid" type="button" mat-raised-button color="primary">Send</button>
                                </div>
                                <button (click)="onUserPOClick()" [disabled]="!f.valid" type="button" mat-raised-button color="accent">PO
                                    Nr.</button>
                                <button (click)="onUserPODeleteClick()" [disabled]="!f.valid" type="button" mat-raised-button color="warn">PO Archiveren</button>
                                <pre [@bounceOnEnter] [@bounceOutOnLeave] *ngIf="isBezig" style="color: white;background: black;">Bezig... ({{s}}s)</pre>
                            </div>
                            <!-- GR -->
                            <mat-form-field [@fadeInLeftOnEnter] *ngIf="wantsToGR" class="example-full-width" appearance="fill">
                                <mat-label>Enter ID</mat-label>
                                <input required type="text" placeholder="Pick one" aria-label="Number" matInput #gr [(ngModel)]="u_ID" name="u_ID" [formControl]="myControl5" [matAutocomplete]="auto3">
                                <mat-autocomplete #auto3="matAutocomplete">
                                    <mat-option *ngFor="let grID of filteredOptions3 | async" [value]="grID">
                                        {{grID}}
                                    </mat-option>
                                </mat-autocomplete>
                            </mat-form-field>
                            <div *ngIf="isGRID">
                                <h3>Wat wil je doen?</h3>
                                <div *ngIf="isGREditing">
                                    <mat-form-field [@fadeInLeftOnEnter] class="example-full-width" appearance="fill">
                                        <mat-label>GR Nr</mat-label>
                                        <input required type="text" placeholder="Pick one" aria-label="Number" matInput #edit_gr="ngModel" [(ngModel)]="u_new_gr" name="u_edit_gr">
                                    </mat-form-field>
                                    <button (click)="onUserGREditClick()" [disabled]="!f.valid" type="button" mat-raised-button color="primary">Send</button>
                                </div>
                                <button (click)="onUserGRClick()" [disabled]="!f.valid" type="button" mat-raised-button color="accent">GR
                                    Nr.</button>
                                <button (click)="onUserGRDeleteClick()" [disabled]="!f.valid" type="button" mat-raised-button color="warn">GR Verwijderen</button>
                                <pre [@bounceOnEnter] [@bounceOutOnLeave] *ngIf="isBezig" style="color: white;background: black;">Bezig... ({{s}}s)</pre>
                            </div>
                            <!-- Sales Rep -->
                            <div *ngIf="wantsToSalesRep">
                                <mat-form-field [@fadeInLeftOnEnter] class="example-full-width" appearance="fill">
                                    <mat-label>Enter Sales Rep. Name</mat-label>
                                    <input required type="text" placeholder="Pick one" aria-label="Number" matInput #salesrep [(ngModel)]="u_salesrep" name="u_salesrep" [formControl]="myControl4" [matAutocomplete]="auto4">
                                    <mat-autocomplete #auto4="matAutocomplete">
                                        <mat-option *ngFor="let sales of filteredOptions4 | async" [value]="sales">
                                            {{sales}}
                                        </mat-option>
                                    </mat-autocomplete>
                                </mat-form-field>
                                <div *ngIf="isSalesRep">
                                    <h3>Wat wil je doen?</h3>
                                    <div *ngIf="isSalesRepEditing">
                                        <mat-form-field [@fadeInLeftOnEnter] class="example-full-width" appearance="fill">
                                            <mat-label>Nieuwe email</mat-label>
                                            <input required type="text" placeholder="Pick one" aria-label="Number" matInput #new_email="ngModel" [(ngModel)]="u_new_email" name="u_new_email">
                                        </mat-form-field>
                                        <mat-form-field [@fadeInLeftOnEnter] class="example-full-width" appearance="fill">
                                            <mat-label>Nieuwe wachtwoord</mat-label>
                                            <input required type="text" placeholder="Pick one" aria-label="Number" matInput #new_pwd="ngModel" [(ngModel)]="u_new_pwd" name="u_new_pwd">
                                        </mat-form-field>
                                        <mat-form-field [@fadeInLeftOnEnter] class="example-full-width" appearance="fill">
                                            <mat-label>Nieuwe naam</mat-label>
                                            <input required type="text" placeholder="Pick one" aria-label="Number" matInput #edit_salesrep="ngModel" [(ngModel)]="u_new_salesrep" name="u_edit_salesrep">
                                        </mat-form-field>
                                        <mat-form-field [@fadeInLeftOnEnter] class="example-full-width" appearance="fill">
                                            <mat-label>Nieuwe sbu</mat-label>
                                            <input required type="text" placeholder="Pick one" aria-label="Number" matInput #new_sbu="ngModel" [(ngModel)]="u_new_sbu" name="u_new_sbu">
                                        </mat-form-field>
                                        <mat-form-field [@fadeInLeftOnEnter] class="example-full-width" appearance="fill">
                                            <mat-label>Nieuwe land</mat-label>
                                            <input required type="text" placeholder="Pick one" aria-label="Number" matInput #new_land="ngModel" [(ngModel)]="u_new_land" name="u_new_land">
                                        </mat-form-field>

                                        <button (click)="onUserSalesRepEditClick()" [disabled]="!f.valid" type="button" mat-raised-button color="primary">Send</button>
                                    </div>
                                    <div *ngIf="askforSalesRepModification">
                                        <h5><b>Huidige</b> info over Sales Rep.:</h5>
                                        <mat-chip-list class="example-chip" cdkDropList cdkDropListOrientation="horizontal" *ngFor="let detail of salesRepDetails">
                                            <mat-chip class="example-box" cdkDrag>
                                                {{detail.id}}
                                            </mat-chip>
                                            <mat-chip class="example-box" cdkDrag>
                                                {{detail.username}}
                                            </mat-chip>
                                            <mat-chip class="example-box" cdkDrag>
                                                {{detail.password}}
                                            </mat-chip>
                                            <mat-chip class="example-box" cdkDrag>
                                                {{detail.naam}}
                                            </mat-chip>
                                            <mat-chip class="example-box" cdkDrag>
                                                {{detail.sbu}}
                                            </mat-chip>
                                            <mat-chip class="example-box" cdkDrag>
                                                {{detail.land}}
                                            </mat-chip>
                                        </mat-chip-list>
                                    </div>
                                    <button (click)="onUserSalesRepClick()" [disabled]="!f.valid" type="button" mat-raised-button color="accent">Vervangen</button>
                                    <button (click)="onUserSalesRepDeleteClick()" [disabled]="!f.valid" type="button" mat-raised-button color="warn">Verwijderen</button>
                                    <pre [@bounceOnEnter] [@bounceOutOnLeave] *ngIf="isBezig" style="color: white;background: black;">Bezig... ({{s}}s)</pre>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <?php include_once 'includes/footer.php'; ?>
        </body>

        </html>
    <?php endif; ?>
    <?php if (!$isAdmin) {
        header('Location: login.php');
    }
