from sqlmodel import SQLModel, Field, Relationship
from typing import Optional, List
from uuid import UUID, uuid4
from datetime import datetime
from enum import Enum

class DocumentType(str, Enum):
    DEVIS = "DEVIS"
    FACTURE = "FACTURE"

class DocumentStatus(str, Enum):
    DRAFT = "DRAFT"
    SENT = "SENT"
    PAID = "PAID"

class Document(SQLModel,table=True):
    id: UUID = Field(default_factory=uuid4, primary_key=True)
    type: DocumentType = Field(default=DocumentType.DEVIS)
    status: DocumentStatus = Field(default=DocumentStatus.DRAFT)
    number: Optional[str] = Field(default=None, index=True)


    created_at: datetime = Field(default_factory=datetime.utcnow)
    due_date: Optional[datetime] = None

    user_id: UUID = Field(foreign_key="user.id")
    client_id: UUID = Field(foreign_key="client.id")

    items: List["DocumentItem"] = Relationship(back_populates="document")


class DocumentItem(SQLModel, table=True):
    id: UUID = Field(default_factory=uuid4, primary_key=True)
    description: str
    quantity: int = 1
    unit_price_cents: int
    tax_rate: int = 20
    
    document_id: UUID = Field(foreign_key="document.id")
    document: Document = Relationship(back_populates="items")